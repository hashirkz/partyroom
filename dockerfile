FROM php

WORKDIR /app

COPY . /app/

# mysql stuff
# RUN sudo apt install mysql-server
# RUN sudo apt install mysql-client

# sqlite3 stuff
RUN sudo apt install sqlite3 
RUN apt install php-sqlite3

# refresh sqlite db
RUN ./server_stuff/refresh.sh


# start partyroom dev server
WORKDIR /app/partyroom
CMD ["php", '-S', 'localhost:8000']
