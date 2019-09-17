const express = require('express');
const bodyParser = require('body-parser');
const app = express();
app.use(bodyParser.json());
const path = require('path');
const db = require("./db");
const collection = "todo";

app.use(express.static(path.join(__dirname, '')));

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'index.html'));
});

app.get('/getTodos', (req, res) => {
    db.getDB().collection(collection).find({}).toArray((err, documents) => {
        if (err) {
            console.log(err);
        } else {
            res.json(documents);
        }
    });
});

app.post('/getActorProfile', (req, res) => {
    db.getDB().collection("actors").find({search: req.body.name}).toArray((err, document) => {
        if (err) {
            console.log(err);
        } else {
            return res.json(document[0]);
        }
    })
});

app.post('/getUserProfile', (req, res) => {
    db.getDB().collection("actors")
        .find({name: req.body.name})
        .toArray((err, document) => {
            if (err) {
                console.log(err);
            } else {
                return res.json(document[0]);
            }
        })
});

// app.put('/:id', (req, res) => {
//     const todoID = req.params.id;
//     const userInput = req.body;
//     db.getDB().collection(collection).findOneAndUpdate({_id: db.getPrimaryKey(todoID)}, {$set: {todo: userInput.todo}}, {returnOriginal: false}, (err, result) => {
//         if (err) {
//             console.log(err);
//         } else {
//             res.json(result);
//         }
//     })
// });

app.put('/putUserProfile', (req, res) => {
    const id = req.body.id;
    const interests = req.body.interests;
    // noinspection JSIgnoredPromiseFromCall
    db.getDB().collection(collection)
        .findOneAndUpdate(
            {_id: db.getPrimaryKey(id)},
            {$set: {interests: interests}},
            {returnOriginal: false},
            (err, result) => {
                if (err) {
                    console.log(err);
                } else {
                    res.json(result);
                }
            })
});

app.post('/', (req, res) => {
    const userInput = req.body;
    // noinspection JSIgnoredPromiseFromCall
    db.getDB().collection(collection).insertOne(userInput, (err, result) => {
        if (err) {
            console.log(err);
        } else {
            res.json({result: result, document: result.ops[0]});
        }
    })
});

app.delete('/:id', (req, res) => {
    const todoID = req.params.id;
    // noinspection JSIgnoredPromiseFromCall
    db.getDB().collection(collection).findOneAndDelete({_id: db.getPrimaryKey(todoID)}, (err, result) => {
        if (err) {
            console.log(err);
        } else {
            res.json(result);
        }
    })
});

db.connect((err) => {
    if (err) {
        console.log("Unable to connect");
        process.exit(1);
    } else {
        app.listen(27017, () => {
            console.log("Connected | App listening");
        });
    }
});


// getting pages
app.get('/login', (req, res) => {
    res.sendFile(path.join(__dirname, 'html/login.html'));
});

app.get('/signup', (req, res) => {
    res.sendFile(path.join(__dirname, 'html/signup.html'));
});

app.get('/actorProfile', (req, res) => {
    res.sendFile(path.join(__dirname, 'html/actorProfile.html'));
});

app.get('/signup_step2', (req, res) => {
    res.sendFile(path.join(__dirname, 'html/signup_step2.html'));
});