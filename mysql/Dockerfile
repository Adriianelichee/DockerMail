FROM mysql:5.7

ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=servidor

COPY init.sql /docker-entrypoint-initdb.d/


EXPOSE 3306

CMD ["mysqld"]