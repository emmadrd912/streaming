// const theMovieDb = require('./TMDB');
// function searchfilmbyname(name)
// {
//   const film = theMovieDb.search.getMovie({"query":name}, getfilmidbyname, errorgetfilmidbyname);
//
//   function getfilmidbyname(data)
//   {
//     let stored = JSON.parse(data);
//     let id = stored.results[0].id;
//     // console.log(id)
//     return id;
//   };
//
//   function errorgetfilmidbyname(data)
//   {
//     console.log("Error callback: " + data);
//   }
//
//   // console.log(film)
//   console.log(id)
//
// }
//
// // function successCB(data) {
// // 	console.log("Success callback: " + data);
// // };
// //
// // function errorCB(data) {
// //         	console.log("Error callback: " + data);
// //     };
//
// function getcomment(id)
// {
//   const film = theMovieDb.movies.getById({"id":id}, getcommentbyid, errorgetcommentbyid);
//
//   function getcommentbyid(data)
//   {
//     let stored = JSON.parse(data);
//     console.log(stored.overview);
//   };
//
//   function errorgetcommentbyid(data)
//   {
//     console.log("Error callback: " + data);
//   };
// };
//
// function releasedate(id)
// {
//   const film = theMovieDb.movies.getById({"id":id}, releasedatebyid, errorreleasedatebyid);
//
//   function releasedatebyid(data)
//   {
//     let stored = JSON.parse(data);
//     console.log(stored.release_date);
//   };
//
//   function errorreleasedatebyid(data)
//   {
//     console.log("Error callback: " + data);
//   };
// };
//
// function gender(id)
// {
//   const film = theMovieDb.movies.getById({"id":id}, genderbyid, errorgenderbyid);
//
//   function genderbyid(data)
//   {
//     let stored = JSON.parse(data);
//     for (let i = 0; i < stored.genres.length; i++)
//     {
//         console.log(stored.genres[i].name);
//     }
//   };
//
//   function errorgenderbyid(data)
//   {
//     console.log("Error callback: " + data);
//   };
// };
//
// function vote(id)
// {
//   const film = theMovieDb.movies.getById({"id":id}, votebyid, errorvotebyid);
//
//   function votebyid(data)
//   {
//     let stored = JSON.parse(data);
//     console.log(stored.vote_average);
//   };
//
//   function errorvotebyid(data)
//   {
//     console.log("Error callback: " + data);
//   };
// };
//
// searchfilmbyname('Ad Astra')
// vote(id)
// gender(id)
// releasedate(id)
// getcomment(id)

const MovieDB = require('moviedb')('97719463bea4bd4b5902c1a735c0556a');

MovieDB.searchMovie({ query: 'Ad Astra' }, (err, res) => {
  console.log(res.results[0].id);
});