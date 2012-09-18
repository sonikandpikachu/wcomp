'''
Created on Sep 18, 2012

@author: Pavel
'''

from sqlalchemy import *
from sqlalchemy.orm import create_session
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import contains_eager, joinedload
from sqlalchemy.orm import relationship


from wcconfig import CONNECTION_STRING
 
#connetcting to database
engine = create_engine(CONNECTION_STRING, echo=False)
metadata = MetaData(bind=engine)
Base = declarative_base()


class CPU(Base): 
    __table__ = Table("wComp_CPU", metadata, autoload=True) 
    
class Type(Base): 
    __table__ = Table("wComp_Type", metadata, autoload=True) 
    
class Memory(Base): 
    __table__ = Table("wComp_Memory", metadata, autoload=True) 
    
class VGA(Base): 
    __table__ = Table("wComp_VGA", metadata, autoload=True) 
    
class HDD(Base): 
    __table__ = Table("wComp_HDD", metadata, autoload=True) 
    
class Audio(Base): 
    __table__ = Table("wComp_Audio", metadata, autoload=True) 
    
class ODD(Base): 
    __table__ = Table("wComp_ODD", metadata, autoload=True) 
    
class WiFi(Base): 
    __table__ = Table("wComp_WiFi", metadata, autoload=True) 
    
class Device(Base): 
    __table__ = Table("wComp_Device", metadata, autoload=True) 
    
class OS(Base): 
    __table__ = Table("wComp_OS", metadata, autoload=True) 
    
class Store(Base): 
    __table__ = Table("wComp_Store", metadata, autoload=True) 
    
class CDevice(Base): 
    __table__ = Table("wComp_CDevice", metadata, autoload=True) 
    
class Garbage(Base): 
    __table__ = Table("wComp_Garbage", metadata, autoload=True) 
    
class Color(Base): 
    __table__ = Table("wComp_Color", metadata, autoload=True) 
    
class ColorList(Base): 
    __table__ = Table("wComp_ColorList", metadata, autoload=True) 
    

class SQLController:

    def create_sql_session(self):
        self._session = create_session(bind=engine)
        return self._session

    def close_sql_session(self):
        self._session.close()
