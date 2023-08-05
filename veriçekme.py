from types import NoneType
from bs4 import BeautifulSoup
import requests
import sys
teamid = int(sys.argv[1])
source = requests.get('https://www.thebluealliance.com/team/{}'.format(teamid)).text
soup = BeautifulSoup(source, 'html.parser')


for row in soup.find_all('div',class_='col-sm-4'):
    try:
        rank = row.find('strong').text
    except AttributeError:
        rank ="NO Information"
        pass
    reginal = row.h3.a.text
    awardsplace = row.ul
    
    print(reginal)
    print(";")
    print("Ranking:",rank)
    print(";")
    print("Awards in Regional:")
    try:
        awards = awardsplace.find_all('li')
    except AttributeError:
        awards= ""
        print(";")
        print("NO Awards Claimed")
        pass
    for award in awards:
        print(";")
        print(award.text)
        
    print("|")      
