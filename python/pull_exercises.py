from selenium import webdriver
from bs4 import BeautifulSoup
import time
import re
import datetime
import pprint

class Br():
    def __init__(self):
        self.browser = webdriver.Chrome('/usr/local/share/chromedriver')
        self.url = "http://www.bodybuilding.com/exercises/finder/lookup/filter/equipment/id/6/equipment/machine"
        self.page = 0
    def start(self):
        self.browser.get(self.url)
        time.sleep(1)
    def remove_filter(self):
        element = self.browser.find_element_by_xpath("//ul[@class='filterCon']/li/a")
        element.click()
        time.sleep(1)
    def next_page(self):
        element = self.browser.find_element_by_xpath("//li[@class='next button']/a")
        element.click()
        self.page+=1
        time.sleep(1)
    def close_out(self):
        self.browser.close()
    def process_page(self):
        result = []
        elements = self.browser.find_elements_by_xpath("//div[@class='exerciseName']/h3/a")
        for x in elements:
            result.append( (x.text, x.get_attribute('href'))  )

        return result


b = Br()
b.start()
b.remove_filter()
exercises = []
exercises += b.process_page()
for x in xrange(58):
    print "Page {}".format(b.page)
    b.next_page()
    exercises += b.process_page()


b.close_out()
print exercises
# this prints out a 873 item list with each item being an exercise and the link to more info
#>> [(u'3/4 Sit-Up', u'http://www.bodybuilding.com/exercises/detail/view/name/34-sit-up'), (u'90/90 Hamstring', u'http://www.bodybuilding.com/exercises/detail/view/name/9090-hamstring'),...]

