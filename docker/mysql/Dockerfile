FROM mysql:5.7.16

# 作成者
MAINTAINER Fenrir Inc.

# timezone
RUN cp -p /usr/share/zoneinfo/Japan /etc/localtime

# 文字コード設定
COPY ./my.cnf /etc/mysql/conf.d/

# # 起動時に実行されるシェル
# RUN mkdir /init-data
# COPY ./create-init-data.sh /docker-entrypoint-initdb.d/

EXPOSE 3306
