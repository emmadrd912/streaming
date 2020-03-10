import Helpers from "./Helpers.js";
import Serie from "./Classes/Serie.js";
import Film from "./Classes/Film.js";

const apiKey = "97719463bea4bd4b5902c1a735c0556a";

const traiterMedia = (data, type) => {
  const media = type == "movie" ? new Film(data) : new Serie(data);
  media.remplir();
};

const traiterMedia1 = (data, type) => {
  const media = type == "movie" ? new Film(data) : new Serie(data);
  media.remplir1();
};

const traiterMedia2 = (data, type) => {
  const media = type == "movie" ? new Film(data) : new Serie(data);
  media.remplir2();
};

const traiterMedia3 = (data, type) => {
  const media = type == "movie" ? new Film(data) : new Serie(data);
  media.remplir3();
};

const traiterMedia4 = (data, type) => {
  const media = type == "movie" ? new Film(data) : new Serie(data);
  media.remplir4();
};

const chargerMedia = () => {
  const id = Helpers.getParam("id");
  const type = Helpers.getParam("type");
  const url = `https://api.themoviedb.org/3/movie/501170?api_key=f3e0583eb3254bc512360eb077868839&language=fr-FR`;
  const url2 = `https://api.themoviedb.org/3/movie/744?api_key=f3e0583eb3254bc512360eb077868839&language=fr-FR`;
  const url3 = `https://api.themoviedb.org/3/movie/181808?api_key=f3e0583eb3254bc512360eb077868839&language=fr-FR`;
  const url4 = `https://api.themoviedb.org/3/tv/62560?api_key=f3e0583eb3254bc512360eb077868839&language=fr-FR`;
  const url5 = `https://api.themoviedb.org/3/tv/62476?api_key=f3e0583eb3254bc512360eb077868839&language=fr-FR`;
  axios
    .get(url)
    .then(response => traiterMedia(response.data, type))
    .catch(error => {
      if (error.response && error.response.status == 404) {
        alert("Média introuvable !");
      } else {
        console.error(error);
      }
    });
    axios
      .get(url2)
      .then(response => traiterMedia1(response.data, type))
      .catch(error => {
        if (error.response && error.response.status == 404) {
          alert("Média introuvable !");
        } else {
          console.error(error);
        }
      });
    axios
      .get(url3)
      .then(response => traiterMedia2(response.data, type))
      .catch(error => {
        if (error.response && error.response.status == 404) {
          alert("Média introuvable !");
        } else {
          console.error(error);
        }
      });
    axios
      .get(url4)
      .then(response => traiterMedia3(response.data, type))
      .catch(error => {
        if (error.response && error.response.status == 404) {
          alert("Média introuvable !");
        } else {
          console.error(error);
        }
      });
  axios
    .get(url5)
    .then(response => traiterMedia4(response.data, type))
    .catch(error => {
      if (error.response && error.response.status == 404) {
        alert("Média introuvable !");
      } else {
        console.error(error);
      }
    });
};

window.addEventListener("load", chargerMedia);
