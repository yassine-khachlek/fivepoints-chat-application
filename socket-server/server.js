var app = require('http').createServer(handler);
var io = require('socket.io')(app);

var Redis = require('ioredis');

var redis = new Redis({
  host: 'redis',    // Redis host
  port: 6379,       // Redis port  
  password: null,   // Redis password
  family: 4,        // 4 (IPv4) or 6 (IPv6)
  db: 0
});

app.listen(3000, function() {
    console.log('Server is running!');
});

function handler(req, res) {
    res.writeHead(200);
    res.end('.');
}

io.on('connection', function(socket) {
    console.log('Connected: ' + socket.id)
});

redis.psubscribe('*', function(err, count) {
    if (err) {
        console.log(err);
    }
});

redis.on('pmessage', function(subscribed, channel, message) {
    message = JSON.parse(message);
    //console.log(subscribed);
    //console.log(channel);
    //console.log(message);
    //io.emit(channel + ':' + message.event, message.data);
    io.emit('MessageEvent', message.data.data);
});
