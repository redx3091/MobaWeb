// console.log(Instafeed)
var feed = new Instafeed({
  accessToken: "IGQVJYV1c0NVlmOWdLOF9kZAkFGQ2hVYnRDNWRodktkRXdURXN4ME9JVHpTSDI1bFlxNXBidWYySEw5QUNoNURYSzdxNC1laXo0RTY2UURHZA2FRNE05WjZArT1E5UU1HcFZARTS1Ec1lRMmJWSlVyR0VzZAwZDZD",
  limit: 9,
  transform: function (item) {
    var d = new Date(item.timestamp);
    item.date = [d.getDate(), d.getMonth(), d.getYear()].join('/');
    return item;
  }
});

feed.run();