#coding: utf-8
'''
Created on Sep 30, 2012

@author: Pavel
'''

class Filter(object):
	'''abstract class for all types of filters'''
	def __init__(self, ftype, question, name, cut_function, dss_function):
		self._ftype = ftype
		self._cut_function = cut_function
		self._dss_function = dss_function
		self._question = question
		self._name = name

	def ftype():
	    doc = "The ftype property."
	    def fget(self):
	        return self._ftype
	    def fset(self, value):
	        self._ftype = value
	    def fdel(self):
	        del self._ftype
	    return locals()
	ftype = property(**ftype())

	def cut_function():
	    doc = "The cut_function property."
	    def fget(self):
	        return self._cut_function
	    def fset(self, value):
	        self._cut_function = value
	    def fdel(self):
	        del self._cut_function
	    return locals()
	cut_function = property(**cut_function())

	def dss_function():
	    doc = "The dss_function property."
	    def fget(self):
	        return self._dss_function
	    def fset(self, value):
	        self._dss_function = value
	    def fdel(self):
	        del self._dss_function
	    return locals()
	dss_function = property(**dss_function())

	def question():
	    doc = "The question property."
	    def fget(self):
	        return self._question
	    def fset(self, value):
	        self._question = value
	    def fdel(self):
	        del self._question
	    return locals()
	question = property(**question())

	def name():
	    doc = "The names property."
	    def fget(self):
	        return self._name
	    def fset(self, value):
	        self._name = value
	    def fdel(self):
	        del self._name
	    return locals()
	name = property(**name())



class RadioFilter(Filter):
	
	def __init__(self, question, name, cut_function = None, dss_function = None, values = None, texts = None,
	 selected = 0):
		super(RadioFilter, self).__init__('radio', question, name, cut_function, dss_function)
		self._values = values
		self._texts = texts
		self._selected = selected

	def values():
	    doc = "The values property."
	    def fget(self):
	        return self._values
	    def fset(self, value):
	        self._values = value
	    def fdel(self):
	        del self._values
	    return locals()
	values = property(**values())

	def texts():
	    doc = "The texts property."
	    def fget(self):
	        return self._texts
	    def fset(self, value):
	        self._texts = value
	    def fdel(self):
	        del self._texts
	    return locals()
	texts = property(**texts()) 

	def selected():
	    doc = "The selected property."
	    def fget(self):
	        return self._selected
	    def fset(self, value):
	        self._selected = value
	    def fdel(self):
	        del self._selected
	    return locals()
	selected = property(**selected())


class SliderFilter(Filter):

	def __init__(self, question, name, cut_function = None, dss_function = None, value = None,
	 slider_min = None, slider_max = None):
		super(SliderFilter, self).__init__('slider', question, name, cut_function, dss_function)
		self._value = value
		self._slider_min, self._slider_max = slider_min, slider_max  

	def value():
	    doc = "The value property."
	    def fget(self):
	        return self._value
	    def fset(self, value):
	        self._value = value
	    def fdel(self):
	        del self._value
	    return locals()
 	value = property(**value())

 	def slider_min():
 	    doc = "The slider_min property."
 	    def fget(self):
 	        return self._slider_min
 	    def fset(self, value):
 	        self._slider_min = value
 	    def fdel(self):
 	        del self._slider_min
 	    return locals()
 	slider_min = property(**slider_min())

 	def slider_max():
 	    doc = "The slider_max property."
 	    def fget(self):
 	        return self._slider_max
 	    def fset(self, value):
 	        self._slider_max = value
 	    def fdel(self):
 	        del self._slider_max
 	    return locals()
 	slider_max = property(**slider_max())

 	



