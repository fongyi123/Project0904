const request = require('request');
// const e = require('express');
// request('https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON', function (error, response, body) {
//    console.log('原始格式，JSON 格式的字串 — — — — — ');
//    console.log(body);
//    console.log('轉成 JS 物件 — — — — — — — — — — ');
//    console.log(JSON.parse(body));
// });


// Create a request variable and assign a new XMLHttpRequest object to it.
var request = new XMLHttpRequest()

// Open a new connection, using the GET request on the URL endpoint
request.open('GET', 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON')

request.onload = function () {
  // Begin accessing JSON data here

  var data = JSON.parse(this.response)

  var data = JSON.parse(this.response)

if (request.status >= 200 && request.status < 400) {
  data.forEach(location => {
    console.log(records.locations.location)
  })
} else {
  console.log('error')
}

}
request.send()