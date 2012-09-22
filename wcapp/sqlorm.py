'''
Created on Sep 18, 2012

@author: Pavel
'''

import sqlalchemy as al
from sqlalchemy.orm import create_session
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import contains_eager, joinedload
from sqlalchemy.orm import relationship


from wcconfig import CONNECTION_STRING
from sqlalchemy.schema import Column
 
#connetcting to database
engine = al.create_engine(CONNECTION_STRING, echo=False)
metadata = al.MetaData(bind=engine)
Base = declarative_base()


class wc_Shop (Base):
    __tablename__ = "wc_Shop"
    id = Column(al.Integer, primary_key=True)
    name = Column(al.String(50))

    def __init__( self, name = None ):
        self.name = name


class wc_OS (Base):
    __tablename__ = "wc_OS"
    id = Column(al.Integer, primary_key=True)
    dssv = Column(al.Float)
    name = Column(al.String(30))
    dssc = Column(al.Integer)

    def __init__( self, dssv = None, name = None, dssc = None ):
        self.dssv = dssv
        self.name = name
        self.dssc = dssc


class wc_Battery (Base):
    __tablename__ = "wc_Battery"
    id = Column(al.Integer, primary_key=True)
    dssv = Column(al.Float)
    capacity = Column(al.String(20))
    voltage = Column(al.String(20))
    power = Column(al.String(20))
    dssc = Column(al.Integer)

    def __init__( self, dssv = None, capacity = None, voltage = None, power = None, dssc = None ):
        self.dssv = dssv
        self.capacity = capacity
        self.voltage = voltage
        self.power = power
        self.dssc = dssc


class wc_Type (Base):
    __tablename__ = "wc_Type"
    id = Column(al.Integer, primary_key=True)
    name = Column(al.String(30))

    def __init__( self, name = None ):
        self.name = name


class wc_Screen (Base):
    __tablename__ = "wc_Screen"
    id = Column(al.Integer, primary_key=True)
    dssv = Column(al.Float)
    cover = Column(al.String(20))
    resolution = Column(al.String(20))
    dssc = Column(al.Integer)
    size = Column(al.String(20))

    def __init__( self, dssv = None, cover = None, resolution = None, dssc = None, size = None ):
        self.dssv = dssv
        self.cover = cover
        self.resolution = resolution
        self.dssc = dssc
        self.size = size


class wc_RAM (Base):
    __tablename__ = "wc_RAM"
    id = Column(al.Integer, primary_key=True)
    dssv = Column(al.Float)
    amount = Column(al.Integer)
    dssc = Column(al.Integer)
    name = Column(al.String(20))
    max_amount = Column(al.Integer)

    def __init__( self, dssv = None, amount = None, dssc = None, name = None, max_amount = None ):
        self.dssv = dssv
        self.amount = amount
        self.dssc = dssc
        self.name = name
        self.max_amount = max_amount


class wc_VGA (Base):
    __tablename__ = "wc_VGA"
    id = Column(al.Integer, primary_key=True)
    dssv = Column(al.Float)
    amount = Column(al.Integer)
    type = Column(al.String(20))
    name = Column(al.String(20))
    dssc = Column(al.Integer)

    def __init__( self, dssv = None, amount = None, type = None, name = None, dssc = None ):
        self.dssv = dssv
        self.amount = amount
        self.type = type
        self.name = name
        self.dssc = dssc


class wc_Color (Base):
    __tablename__ = "wc_Color"
    id = Column(al.Integer, primary_key=True)
    name = Column(al.String(20))

    def __init__( self, name = None ):
        self.name = name


class wc_Computer (Base):
    __tablename__ = "wc_Computer"
    id = Column(al.Integer, primary_key=True)
    slot = Column(al.String(50))
    cardreader = Column(al.Integer)
    maker_url = Column(al.String(20))
    name = Column(al.String(20))
    weight = Column(al.Float)
    out_ports = Column(al.String(20))
    modem56 = Column(al.Integer)
    wifi = Column(al.Integer)
    dssv = Column(al.Float)
    webcamera = Column(al.Float)
    height = Column(al.Float)
    width = Column(al.Float)
    length = Column(al.Float)
    wimax = Column(al.Integer)
    comments = Column(al.String(100))
    url = Column(al.String(100))
    network_adapter = Column(al.Integer)
    Bluetooth = Column(al.Integer)
    G3 = Column(al.Integer)
    dssc = Column(al.Integer)
    cartrider = Column(al.Integer)
    id_wc_OS = Column(al.Integer)
    id_wc_Battery = Column(al.Integer)
    id_wc_Type = Column(al.Integer)
    id_wc_Screen = Column(al.Integer)
    id_wc_RAM = Column(al.Integer)
    id_wc_VGA = Column(al.Integer)
    id_wc_Color = Column(al.Integer)
    id_wc_Chipset = Column(al.Integer)
    id_wc_Audio = Column(al.Integer)
    id_wc_ODD = Column(al.Integer)
    id_wc_CPU = Column(al.Integer)
    id_wc_HD = Column(al.Integer)


    def __init__( self, slot = None, cardreader = None, maker_url = None, name = None,
                   weight = None, out_ports = None, modem56 = None, wifi = None, dssv = None, webcamera = None,
                    height = None, width = None, length = None, wimax = None, comments = None, url = None,
                     network_adapter = None, Bluetooth = None, G3 = None, dssc = None, cartrider = None, 
                     id_wc_Shop = None,id_wc_OS = None,id_wc_Battery = None,id_wc_Type = None,id_wc_Screen = None,
                     id_wc_RAM = None,id_wc_VGA = None,id_wc_Color = None,id_wc_Computer = None,id_wc_SSD = None,
                     id_wc_Chipset = None,id_wc_CDevice = None,id_wc_Audio = None,id_wc_ODD = None,id_wc_CPU = None,
                     id_wc_HD = None, ):
        self.slot = slot
        self.cardreader = cardreader
        self.maker_url = maker_url
        self.name = name
        self.weight = weight
        self.out_ports = out_ports
        self.modem56 = modem56
        self.wifi = wifi
        self.dssv = dssv
        self.webcamera = webcamera
        self.height = height
        self.width = width
        self.length = length
        self.wimax = wimax
        self.comments = comments
        self.url = url
        self.network_adapter = network_adapter
        self.Bluetooth = Bluetooth
        self.G3 = G3
        self.dssc = dssc
        self.cartrider = cartrider
        self.id_wc_Shop = id_wc_Shop
        self.id_wc_OS = id_wc_OS
        self.id_wc_Battery = id_wc_Battery
        self.id_wc_Type = id_wc_Type
        self.id_wc_Screen = id_wc_Screen
        self.id_wc_RAM = id_wc_RAM
        self.id_wc_VGA = id_wc_VGA
        self.id_wc_Color = id_wc_Color
        self.id_wc_Computer = id_wc_Computer
        self.id_wc_SSD = id_wc_SSD
        self.id_wc_Chipset = id_wc_Chipset
        self.id_wc_CDevice = id_wc_CDevice
        self.id_wc_Audio = id_wc_Audio
        self.id_wc_ODD = id_wc_ODD
        self.id_wc_CPU = id_wc_CPU
        self.id_wc_HD = id_wc_HD



class wc_Chipset (Base):
    __tablename__ = "wc_Chipset"
    id = Column(al.Integer, primary_key=True)
    dssv = Column(al.Float)
    name = Column(al.String(50))
    dssc = Column(al.Integer)

    def __init__( self, dssv = None, name = None, dssc = None ):
        self.dssv = dssv
        self.name = name
        self.dssc = dssc


class wc_CDevice (Base):
    __tablename__ = "wc_CDevice"
    id = Column(al.Integer, primary_key=True)
    price = Column(al.Float)
    id_wc_Computer = Column(al.Integer)
    id_wc_Shop = Column(al.Integer)
    

    def __init__( self, price = None, id_wc_Computer = None, id_wc_Shop = None ):
        self.price = price
        self.id_wc_Shop = id_wc_Shop
        self.id_wc_Computer = id_wc_Computer


class wc_Audio (Base):
    __tablename__ = "wc_Audio"
    id = Column(al.Integer, primary_key=True)
    dssv = Column(al.Float)
    name = Column(al.String(40))
    dssc = Column(al.Integer)

    def __init__( self, dssv = None, name = None, dssc = None ):
        self.dssv = dssv
        self.name = name
        self.dssc = dssc


class wc_ODD (Base):
    __tablename__ = "wc_ODD"
    id = Column(al.Integer, primary_key=True)
    dssv = Column(al.Float)
    name = Column(al.String(40))
    dssc = Column(al.Integer)

    def __init__( self, dssv = None, name = None, dssc = None ):
        self.dssv = dssv
        self.name = name
        self.dssc = dssc


class wc_CPU (Base):
    __tablename__ = "wc_CPU"
    id = Column(al.Integer, primary_key=True)
    kernel_count = Column(al.Integer)
    dssc = Column(al.Integer)
    mark = Column(al.String(20))
    frequency = Column(al.Float)
    dssv = Column(al.Float)
    type = Column(al.String(40))

    def __init__( self, kernel_count = None, dssc = None, mark = None, frequency = None, dssv = None, type = None ):
        self.kernel_count = kernel_count
        self.dssc = dssc
        self.mark = mark
        self.frequency = frequency
        self.dssv = dssv
        self.type = type


class wc_HD (Base):
    __tablename__ = "wc_HD"
    id = Column(al.Integer, primary_key=True)
    info = Column(al.String(50))
    dssc = Column(al.Integer)
    mark = Column(al.String(30))
    dssv = Column(al.Float)
    amount = Column(al.Float)
    ssd_amount = Column(al.Float)
    interface = Column(al.String(30))
    speed = Column(al.Float)

    def __init__( self, info = None, dssc = None, mark = None, dssv = None, amount = None, ssd_amount = None, interface = None, speed = None ):
        self.info = info
        self.dssc = dssc
        self.mark = mark
        self.dssv = dssv
        self.amount = amount
        self.ssd_amount = ssd_amount
        self.interface = interface
        self.speed = speed






class SQLController:

    def __init__(self):
        from sqlalchemy.orm import sessionmaker
        self._session_maker = sessionmaker(bind=engine)
        self._session_maker.configure(bind=engine)

    def create_sql_session(self):
        self._session = self._session_maker()
        return self._session

    def close_sql_session(self):
        self._session.close()


if __name__ == '__main__':
    pass
#    Base.metadata.create_all(engine) 
#    user = User(name = 'name', fullname = 'fullname', password = 'password')
#    controller = SQLController()
#    session = controller.create_sql_session()
#    controller.close_sql_session()
#    session.new
#    session.add(user)
#    session.commit()
#    print session.query(User).first().name