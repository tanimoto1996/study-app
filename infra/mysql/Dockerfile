FROM mysql:8.0

ENV MYSQL_DATABASE=study_app \
  MYSQL_USER=tanimoto \
  MYSQL_PASSWORD=kakaka \
  MYSQL_ROOT_PASSWORD=secret \
  TZ=Asia/Tokyo

COPY ./my.cnf /etc/mysql/conf.d/my.cnf
RUN chmod 644 /etc/mysql/conf.d/my.cnf