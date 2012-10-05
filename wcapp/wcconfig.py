'''
Created on Sep 18, 2012

@author: Pavel
'''

#database configurations:
DATABASE = 'mysql://'
USERNAME = 'root'
PASSWORD = 'wcomp'
HOST = '127.0.0.1:3307'

GARBAGE_SCHEME = 'wComp'
REAL_SCHEME = 'wc'

GARBAGE_CONNECTION_STRING = DATABASE + USERNAME + ':' + PASSWORD + '@' + HOST + '/' + GARBAGE_SCHEME + '?charset=utf8'
REAL_CONNECTION_STRING = DATABASE + USERNAME + ':' + PASSWORD + '@' + HOST + '/' + REAL_SCHEME + '?charset=utf8'



#from sqlalchemy import create_engine
#print DATABASE + USERNAME + ':' + PASSWORD + '@' + HOST + '/wComp'
#engine = create_engine(DATABASE + USERNAME + ':' + PASSWORD + '@' + HOST, echo=True)
