FROM php:8.2-cli

# Set the working directory to /var/www/html

WORKDIR /var/www/html/
COPY . .

# Remove unnecessary files from the container
RUN mv utils/schema.sql /
RUN mv utils/wait-for-mysql.sh /

# Configure PHP needed extensions (dependencies)
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
RUN docker-php-ext-install pdo_mysql

# Install the mariadb client to run the migration
RUN apt update && apt install mariadb-client -y

# Expose the HTTP port
EXPOSE 80

# Ensure that the MySQL container is started and launch migration
RUN echo "/wait-for-mysql.sh" > /init.sh 
RUN echo "php -S 0.0.0.0:80 -t /var/www/html/" >> /init.sh

RUN chmod +x /wait-for-mysql.sh
RUN chmod +x /init.sh

CMD ["/init.sh"]
