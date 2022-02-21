const express = require('express')
const app = express() 
const server = require('http').createServer(app)
const port = process.env.PORT || 3000 

// just to test the server 
app.get('/', (req, res) => {
     res.status(200).send('Working')
 }) 

server.listen(port, () => {
     console.log(`Server running on port: ${port}`) 
})



//  app.get('/chat', (req,res) => {
//      res.sendFile(_rname + '/index.html')
//  })
const io = require("socket.io")(server, {
    cors: {
      origin: "http://localhost:8080",
      methods: ["GET", "POST"]
    }
  });

//io.origin("*")

// const io = socketIo(http,{cors:{origin:"ws://localhost:8000",methods:["GET","POST"]}})

io.on('connection',(socket) => {
    console.log('Connected...')
    socket.on('message', (data) => {
        socket.broadcast.emit('Client_'+data.to, data)
    })
})