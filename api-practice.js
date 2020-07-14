const http = require("http");
const url = require("url");
const port = 3000;
const hostname = 'localhost'
const server = http.createServer((req, res) => {
    const reqUrl = url.parse(req.url, true);
    if (reqUrl.pathname === '/sample1' && req.method === 'GET') {
        console.log("GOT A GET");
        sampleRequest(req, res);
    } else if (reqUrl.pathname === '/sample1' && req.method === 'POST') {
        console.log('Got a post');
        testRequest(req, res);
    }
});

server.listen(port, hostname, () => {
    console.log("server running");
})

testRequest = (req, res) => {
    let body = '';
    req.on('data', (chunk) => {
        body += chunk;
    });

    req.on('end', () => {
        const post_body = JSON.parse(body);
        let response = {
            name: post_body.name,
            age: post_body.age,
        }
        res.statusCode = 200;
        res.setHeader('Content-Type', 'application/json');
        res.end(JSON.stringify(response.name + " " + response.age));
    });
}

sampleRequest = (req, res) => {
    let reqUrl = url.parse(req.url, true);
    let name = 'World';
    if (reqUrl.query.name) {
        name = reqUrl.query.name;
    }

    let response = {
        name: name
    }

    res.statusCode = 200;
    res.setHeader('Content-Type', 'application/json');
    res.end(JSON.stringify(response.name));
}
