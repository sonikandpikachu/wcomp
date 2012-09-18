'''
Created on Sep 18, 2012

@author: Pavel
'''
from wcconfig import CONNECTION_STRING
import sqlorm

from flask import Flask, render_template

app = Flask(__name__)

@app.route('/', methods = ['GET','POST'])
def index():
    name = 'monti'
    return render_template('first_page.html', name = name)

if __name__ == '__main__':
    app.run()