#coding: utf-8
'''
Created on Sep 18, 2012

@author: Pavel
'''
from sqlorm import *
from filters.settings import ALL_FILTERS
from filters import dss

from flask import Flask, render_template, request

COMPUTERS_ON_PAGE = 10

app = Flask(__name__)
computers = None


@app.route('/')
def first():
    return render_template('index.html', name = request.method) 
    
    
@app.route('/qa/', methods=['POST', 'GET'])
def second():
    controller = SQLController()
    session = controller.create_sql_session()

    global computers
    computers = session.query(wc_Computer).all()

    if request.method == 'POST':
        computers = filter_computers(session, computers, ALL_FILTERS, request.form)#obrezalovka
    
    pages_count = len(computers) / COMPUTERS_ON_PAGE
    page = int(request.args.get('page', '')) if 'page' in request.args else 1
    # print computers[int(page) * COMPUTERS_ON_PAGE : (int(page) + 1) * COMPUTERS_ON_PAGE]
    computers = computers[(page-1) * COMPUTERS_ON_PAGE : min(page * COMPUTERS_ON_PAGE, len(computers))]

    computer_components = _get_all_components(session, computers)#dss
    controller.close_sql_session()
    return render_template('QandA.html', computers = computer_components, filters = ALL_FILTERS,
        current_page = page, pages_count = pages_count)


def filter_computers(session, computers, filters, form):
    for f in filters:
        if f.name in form.keys():
            if f.cut_function: computers = f.cut_function(session, computers, form[f.name]) 
            if f.dss_function: f.dss_function(form[f.name])
    return computers

def _get_all_components(session, computers):
    components = []
    for computer in computers:
        battery = session.query(wc_Battery).filter_by(id = computer.id_wc_Battery).first()
        vga = session.query(wc_VGA).filter_by(id = computer.id_wc_VGA).first()
        hd = session.query(wc_HD).filter_by(id = computer.id_wc_HD).first()
        odd = session.query(wc_ODD).filter_by(id = computer.id_wc_ODD).first()
        type = session.query(wc_Type).filter_by(id = computer.id_wc_Type).first()
        chipset = session.query(wc_Chipset).filter_by(id = computer.id_wc_Chipset).first()
        screen = session.query(wc_Screen).filter_by(id = computer.id_wc_Screen).first()
        ram = session.query(wc_RAM).filter_by(id = computer.id_wc_RAM).first()
        os = session.query(wc_OS).filter_by(id = computer.id_wc_OS).first()
        cpu = session.query(wc_CPU).filter_by(id = computer.id_wc_CPU).first()
        
        dictionary = {'battery': battery, 'vga' : vga, 'hd' : hd, 'odd' : odd, 'type' : type, 'chipset' : chipset,
                      'screen' : screen, 'ram' : ram, 'os' : os, 'cpu' : cpu, 'comp' : computer}

        dss_weight = dss.get_dss_weight(dictionary)
        dictionary['dss'] = dss_weight

        components.append(dictionary)
    components = dss.sort_by_weight(components)
    return components


 
if __name__ == '__main__':
    app.run(debug = True)

