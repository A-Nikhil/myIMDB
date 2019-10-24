const express = require('express'),
    bodyParser = require('body-parser'),
    app = express();
app.use(bodyParser.json());
const path = require('path'),
    db = require("./db"),
    users = "users",
    actors = "actors",
    movies = "movies2";

app.use(express.static(path.join(__dirname, '')));


// ============= GET Methods =============
// getting the main page
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'index.html'));
});

// getting a list of all movies
app.get('/getMovieList', (req, res) => {
    db.getDB().collection(movies).find({}).toArray((err, documents) => {
        if (err) {
            console.log(err);
        } else {
            res.json(documents);
        }
    });
});


// POST methods
app.post('/getActorProfile', (req, res) => {
    db.getDB().collection(actors).find({search: req.body.name}).toArray((err, document) => {
        if (err) {
            console.log(err);
        } else {
            return res.json(document[0]);
        }
    })
});

app.post('/getUserProfile', (req, res) => {
        db.getDB().collection(users)
            .find({username: req.body.username})
            .toArray((err, document) => {
                    if (err) {
                        console.log(err);
                    } else {
                        if (document[0] === undefined) {
                            console.log("A falsis, onus salvus calceus.");
                            document = [{errorStatus: 1}];
                        }
                        // console.log(document);
                        // console.log(document[0]);
                        res.json(document[0]);
                    }
                }
            )
    }
);

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

app.post('/putUserInterests', (req, res) => {
    const username = req.body.username;
    const interests = req.body.interests;
    // noinspection JSIgnoredPromiseFromCall
    db.getDB().collection(users)
        .findOneAndUpdate(
            {username: username},
            {$set: {interests: interests}},
            {returnOriginal: false},
            (err, result) => {
                if (err) {
                    console.log(err);
                } else {
                    res.json(result);
                }
            }
        )
});


app.post('/putUserLanguages', (req, res) => {
    const username = req.body.username;
    const langs = req.body.languages;
    // noinspection JSIgnoredPromiseFromCall
    db.getDB().collection(users)
        .findOneAndUpdate(
            {username: username},
            {$set: {languages: langs}},
            {returnOriginal: false},
            (err, result) => {
                if (err) {
                    console.log(err);
                } else {
                    res.json(result);
                }
            }
        )
});

app.post('/putDummyMovies', (req, res) => {
    const userInput = req.body;
    // noinspection JSIgnoredPromiseFromCall
    db.getDB().collection('movies2').insertOne(userInput, (err, result) => {
        if (err) {
            console.log(err);
        } else {
            res.json({result: result, document: result.ops[0]});
            console.log("inserted");
        }
    })
});


app.post('/', (req, res) => {
    const userInput = req.body;
    // noinspection JSIgnoredPromiseFromCall
    db.getDB().collection(users).insertOne(userInput, (err, result) => {
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
    db.getDB().collection(users).findOneAndDelete({_id: db.getPrimaryKey(todoID)}, (err, result) => {
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


// ============= Getting WebPages =============
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

app.get('/signup_step3', (req, res) => {
    res.sendFile(path.join(__dirname, 'html/signup_step3.html'));
});

app.get('/userDashboard', (req, res) => {
    res.sendFile(path.join(__dirname, 'html/userDashboard.html'));
});

app.get('/engine', (req, res) => {
    res.sendFile(path.join(__dirname, 'html/engine.html'));
});

app.get('/inserter', (req, res) => {
    res.sendFile(path.join(__dirname, 'html/puttingMovies.html'));
});

app.get('/engineRun', (req, res) => {
    res.sendFile(path.join(__dirname, 'html/engineRun.html'));
});