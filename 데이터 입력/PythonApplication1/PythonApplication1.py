import mysql.connector
from bs4 import BeautifulSoup
import urllib.request
mydb = mysql.connector.connect(
  host="us-cdbr-east-02.cleardb.com",
  user="b908d43908fdb1",
  password="1c41a4ab",
  database="heroku_8c68daa40504b72"
)
mycursor = mydb.cursor()
for j in range(1,7):
    url = 'https://ridibooks.com/bestsellers/general?page='+str(j)
    with urllib.request.urlopen(url) as fs :
        soup = BeautifulSoup(fs.read().decode(fs.headers.get_content_charset()), 'html.parser')
        items = soup.find_all('a', {'class' : 'title_link'})
        price=soup.select(".buy_price_info > .price")
        name=soup.find_all('p',{'class':'book_metadata author'})
        images=[]
        for img in soup.findAll('img'):
            images.append(img.get('data-src'))

 #price
    for i in range(30):
        won=[]
        price[i]=price[i].get_text(strip = True)
        for word in price[i]:
            if word=="," or word=="원":
                continue
            else:
                won.append(word)
        price[i]=''.join(won)

#book
    for i in range(30):
        items[i]=items[i].get_text(strip = True)
#author
    for i in range(30):
        name[i]=name[i].get_text(strip = True)
#desc
    descs=[]
    for image in images[3:33]:
        url='https://ridibooks.com/books/'+image.split("/")[4]
        with urllib.request.urlopen(url) as fs :
            soup = BeautifulSoup(fs.read().decode(fs.headers.get_content_charset()), 'html.parser')
            desc=soup.select(".introduce_paragraph")[0]
            descs.append(desc)
    for a in range(29):
        if price[a]=="무료":
            continue
        else:
            mycursor.execute("""INSERT INTO books (book_name, book_cover,description,price,author) VALUES (%s, %s, %s, %s, %s);""", (str(items[a]),str(images[a+3]),str(descs[a]),int(price[a]),str(name[a])))
            mydb.commit()
        print('완료')
    #local = datetime.datetime.now()
    #date= str(local.year)+'_'+str(local.month)+'_'+str(local.day)
    #desktopPath = os.path.expanduser('~')
    #filePath = desktopPath + '\desktop/'+str(date)+str(j)+'.txt'
    #with open( filePath, 'w+',encoding='utf-8') as file:
    #    for i in range(30) :
    #        file.write(str(items[i])+'-'+str(name[i])+'\t'+str(images[i+3])+'\n'+str(descs[i])+'\n'
