from bs4 import BeautifulSoup
import requests
import sys
teamid = int(sys.argv[1])
yearid = int(sys.argv[2])
source = requests.get('https://www.thebluealliance.com/team/{}/{}'.format(teamid,yearid)).text
soup = BeautifulSoup(source, 'html.parser')

for row in soup.find_all('div',class_='col-sm-4'):
    rank = row.find('strong')
    reginal = row.h3.a.text
    awardsplace = row.ul
    print(reginal)
    print(";")
    print("Ranking:",rank.text)
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
