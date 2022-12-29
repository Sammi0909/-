透過 php 程式碼進行呼叫及寫入手環的資訊，以進入資料庫。

Fitbit 手錶資訊的獲取流程為：

1.於 Fitbit 官方網站登入註冊程式後，獲取網址列的一串 code。
2.使用 code 獲取 access_token 
3.使用 access_token 和上網站的 API 獲取所需之手環數據，並把 
4.json 轉換成 php 變量，再去做 value 的提取。

再將我們需要的數據匯入資料庫 

