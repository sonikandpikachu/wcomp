#coding: utf-8
'''
Created on Sep 30, 2012

@author: Pavel
'''

DSS_WEIGHTS = { 'comp' : 1, 'cpu' : 0, 'ram' : 0, 'vga' : 0, 
 	 'battery' : 0, 'hd' : 0, 'odd' : 0, 'os' : 0, 'chipset' : 0}

def get_dss_weight (components):
	weight = 0
	for w in DSS_WEIGHTS:
		weight += DSS_WEIGHTS[w]*components[w].dssv
	return weight

def _max_weight(computers_components):
	maximum = computers_components[0]
	for cc in computers_components:
		if maximum['dss'] < cc['dss']: maximum = cc
	return maximum

def sort_by_weight (computers_components):
	sorted = []
	while computers_components:
		maximum = _max_weight(computers_components)
		computers_components.remove(maximum)
		sorted.append(maximum)
	return sorted

