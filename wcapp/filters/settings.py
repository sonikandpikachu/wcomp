#coding: utf-8
'''
Created on Sep 30, 2012

@author: Pavel
'''
import filters
from sqlorm import wc_Type, wc_OS, wc_CPU
from dss import DSS_WEIGHTS


#adding radio filter for computer type:
def type_cut_function(session, computers, answer):
	typeFilter.selected = typeFilter.values.index(answer)
	return [computer for computer in computers
		if session.query(wc_Type).filter_by(id = computer.id_wc_Type).first().name in answer ]

typeFilter = filters.RadioFilter('What type of computer do you want?',
										 'typeFilter', cut_function = type_cut_function, selected = 1)
typeFilter.texts = "notebook", 'ultrabook', 'desctop'
typeFilter.values =  u"Ноутбук,Ультрабук", u"Ультрабук", u'Десктоп'


#adding radio filter for OS:
def os_cut_function(session, computers, answer):
	osFilter.selected = osFilter.values.index(answer)
	return [computer for computer in computers
		if session.query(wc_OS).filter_by(id = computer.id_wc_OS).first().name in answer ]

osFilter = filters.RadioFilter(u'Какую ос вы предпочитаете?',
										 'osFilter', cut_function = os_cut_function, selected = 1)
osFilter.texts = "DOS", "Mac OS x 10.7 Lion", 'Linux'
osFilter.values =  u"DOS", u"Mac OS x 10.7 Lion", u'Linux'


#adding slider filter for cpu frequency:
def cpu_frequency_cut_function(session, computers, answer):
	cpuFrequencyFilter.value = answer
	return [computer for computer in computers
		if session.query(wc_CPU).filter_by(id = computer.id_wc_CPU).first().frequency >= float(answer)] 

cpuFrequencyFilter = filters.SliderFilter('Please input frequency', 'cpuFrequencyFilter',
					 cut_function = cpu_frequency_cut_function)

cpuFrequencyFilter.slider_max = '3.2'
cpuFrequencyFilter.slider_min = '0'
cpuFrequencyFilter.value = '1.7'


#adding radio filter for kernel count
def cpu_dss_function(answer):
	cpuFilter.selected = cpuFilter.values.index(answer)
	DSS_WEIGHTS['cpu'] = 2 if answer == u"Да" else 0
	
cpuFilter = filters.RadioFilter(u'Будете ли Вы производить сложные вычисления?',
										 'cpuFilter', dss_function = cpu_dss_function, selected = 1)
cpuFilter.texts = u"Да", u"Нет"
cpuFilter.values =  u"Да", u"Нет"


ALL_FILTERS = typeFilter, osFilter, cpuFrequencyFilter, cpuFilter