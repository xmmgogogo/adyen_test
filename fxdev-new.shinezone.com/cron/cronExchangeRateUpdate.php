<?php

# crontab -e
# * * * * * /data1/app/services/php56/bin/php  /data1/www/fxdev-new.shinezone.com/Cron/cronExchangeRateUpdate.php >> /tmp/cron.log
# 每一分钟更新一次汇率
# 以Json格式保存文件当中备用

require_once __DIR__ . "/../functions/Functions.php";
setExchangeRate();