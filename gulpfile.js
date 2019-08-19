const { src, dest,series, watch } = require('gulp');
const rename = require('gulp-rename');


function test(done) {
    console.log('Test');
    done();
}

function buildDevelopment(done) {
    return src('web/index-dev.php')
            .pipe(rename('index.php'))
            .pipe(dest('web/'));
    done();
}

function buildProduction(done) {
    return src('web/index-prod.php')
            .pipe(rename('index.php'))
            .pipe(dest('web/'));
    done();
}
exports.test = test;
exports.prod = buildProduction;
exports.dev = buildDevelopment;