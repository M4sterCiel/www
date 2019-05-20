let app = require("express")()
console.log('plop')

app.set('view engine', 'ejs')

app.get('/', (request, response) => {
    response.render('pages/index', {test: 'Hey you'})
})

app.listen(8080)