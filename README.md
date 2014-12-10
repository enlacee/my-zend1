=======
myzend1
=======

app basic for config *advanced* 


![init project zf1](http://i58.tinypic.com/10hom79.png)


### step 01, 02

http://myzend1.local/default/index
http://myzend1.local/default/index/add
http://myzend1.local/default/index/update/id
http://myzend1.local/default/register

# acceder al modulo promo and default
http://myzend1.local/promo
http://myzend1.local/default



### step 03

http://myzend1.local/default/user/index











### command line
    #  ZF1
    # OPTION 1 : create link simbolic
    sudo ln -s /w/sites/zf/bin/zf.sh /usr/bin/zf
    # use comand
    zf show version

    # Create project zend with module : *default*
    zf create project myzend1
    # create module
    zf create module default
    # important ever create one index in module default
    zf create controller index index default
    # create action 
    create action successful --controller-name=Index -m default

    # create model
    zf create model User
    zf create model User -m default # -m : indica modulo
    # create db-adapter (db)
    zf configure dbadapter "adapter=Pdo_Mysql&username=root&password=123456&dbname=myzend1"
    # create table
    zf create dbtable User user

    # --------------------------------------------
    # confi application.ini
    # change module
    resources.frontController.defaultModule = "frontend"
    # .


