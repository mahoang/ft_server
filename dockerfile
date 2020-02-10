FROM debian:buster

#utils
RUN apt-get update \
&& apt-get -y upgrade \
&& apt-get -y install apt-utils \
&& apt-get -y install vim \
&& apt-get -y install curl

RUN apt-get -y install nginx \
&& apt-get -y install mariadb-server \
&& apt-get -y install default-mysql-server \
&& apt-get -y install php php7.3-fpm php-mysql php-cli php-mbstring

#copy
COPY ./srcs/mysql_config.sql /home/
COPY ./srcs/nginx_conf ./home/
COPY ./srcs/start.sh ./home/
COPY ./srcs/latest.tar.gz ./home/
COPY ./srcs/self-signed.conf ./home/
COPY ./srcs/wp-config.php ./home/
COPY ./srcs/phpMyAdmin-4.9.4.tar.gz ./home/
COPY ./srcs/config.inc.php ./home/
COPY ./srcs/wordpress.sql ./home/

#nginx
RUN service nginx start \
&& mkdir /var/www/localhost \
&& cp /home/nginx_conf  /etc/nginx/sites-available/localhost \
&& ln -s /etc/nginx/sites-available/localhost /etc/nginx/sites-enabled/ \
&& rm /etc/nginx/sites-enabled/default

#ssl
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -subj '/C=FR/ST=Paris/L=Paris/O=42/OU=42/CN=localhost' -keyout /etc/ssl/private/nginx-selfsigned.key -out /etc/ssl/certs/nginx-selfsigned.crt \
&& cp /home/self-signed.conf /etc/nginx/snippets/self-signed.conf

#wordpress
RUN tar xzvf /home/latest.tar.gz -C /var/www/localhost \
&& cp /home/wp-config.php ./var/www/localhost/wordpress
#%EWDRgJ9dBXW5%3Y4N

#phpmyadmin
RUN tar xzvf /home/phpMyAdmin-4.9.4.tar.gz -C /var/www/localhost/ \
&& mv /var/www/localhost/phpMyAdmin-4.9.4-all-languages /var/www/localhost/phpMyAdmin \
&& cp ./home/config.inc.php /var/www/localhost/phpMyAdmin/ \
&& chown -R www-data:www-data /var/www/*

#mysql
RUN service mysql start \
&& mysql -u root < /home/mysql_config.sql

RUN service mysql start \
&& mysql wordpress -u root < /home/wordpress.sql

EXPOSE 80 443

CMD bash ./home/start.sh

#docker build -t server
#docker run -it -p 80:80 -p 443:443 --name server
