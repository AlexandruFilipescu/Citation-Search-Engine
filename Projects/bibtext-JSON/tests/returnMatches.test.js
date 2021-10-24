const lib = require('../lib');


test('Returning "Paolo","Nierstrasz" matches from the textFile1.json', async () => {
    const totalMatches = await lib.returnMatches(['Paolo','Nierstrasz']);
    expect(totalMatches).toEqual(3);
})

test('Returning "nierstrasz" matches from the textFile1.json', async () => {
    const totalMatches = await lib.returnMatches(['nierstrasz']);
    expect(totalMatches).not.toEqual(3);
})

test('Returning ACM of matches from the textFile1.json', async () => {
    const totalMatches = await lib.returnMatches(['ACM']);
    expect(totalMatches).toEqual(3);
})

test('Returning scglib of matches from the textFile1.json', async () => {
    const totalMatches = await lib.returnMatches(['scglib']);
    expect(totalMatches).toEqual(3);
})

test('Returning Scglib of matches from the textFile1.json, should return 0', async () => {
    const totalMatches = await lib.returnMatches(['Scglib']);
    expect(totalMatches).toEqual(0);
})

test('Returning June of matches from the textFile1.json', async () => {
    const totalMatches = await lib.returnMatches(['June']);
    expect(totalMatches).toEqual(4);
})

test('Returning 1993 of matches from the textFile1.json', async () => {
    const totalMatches = await lib.returnMatches(['1993']);
    expect(totalMatches).toEqual(1);
})

test('Returning 2000 of matches from the textFile1.json', async () => {
    const totalMatches = await lib.returnMatches(['2000']);
    expect(totalMatches).toEqual(1);
})