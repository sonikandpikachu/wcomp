'''
Created on Sep 18, 2012

@author: Pavel
'''
from wcconfig import CONNECTION_STRING
import sqlorm

from flask import Flask, render_template, request

app = Flask(__name__)


@app.route('/')
def first():
    return render_template('index.html', name = request.method) 
    
    
@app.route('qa/')
def second():
    question = 'what computer do you want?'
    answers = ['ans1', 'ans2']
    computers = []
    computers.append((('name' , 'comp1'), ('cpu' , 'cpu 2'), ('stars' , 4), ('vga' , 'vga23')))
    computers.append((('name' , 'comp2'), ('cpu' , 'cpu 2'), ('stars' , 4), ('vga' , 'vga23')))
    return render_template('QandA.html', question = 'what computer do you want?', answers = answers, computers = computers)

 
if __name__ == '__main__':
    app.run()
