'''
Created on Sep 18, 2012

@author: Pavel
'''

#database configurations:
DATABASE = 'mysql://'
USERNAME = 'root'
PASSWORD = 'wcomp'
HOST = '127.0.0.1'

CONNECTION_STRING = DATABASE + USERNAME + ':' + PASSWORD + '@' + HOST + '/wComp'



#from sqlalchemy import create_engine
#print DATABASE + USERNAME + ':' + PASSWORD + '@' + HOST + '/wComp'
#engine = create_engine(DATABASE + USERNAME + ':' + PASSWORD + '@' + HOST, echo=True)
