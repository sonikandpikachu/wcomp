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
    return render_template('first_page.html', name = request.method)
    
    
@app.route('/second/')
def second():
    return render_template('second_page.html', question = 'question', answers = ['ans1', 'ans2'], computers = ['c1','c2'])

 
if __name__ == '__main__':
    app.run()