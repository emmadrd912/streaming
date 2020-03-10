import Helpers from "./Helpers.js";
import Serie from "./Classes/Serie.js";
import Film from "./Classes/Film.js";

const apiKey = "97719463bea4bd4b5902c1a735c0556a";

const traiterMedia = (data, type) => {
  const media = type == "movie" ? new Film(data) : new Serie(data);
  media.remplir();
};

const chargerMedia = () => {
  const id = Helpers.getParam("id");
  const type = Helpers.getParam("type");
  const url = `https://api.themoviedb.org/3/movie/501170?api_key=f3e0583eb3254bc512360eb077868839&language=fr-FR`;
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
};

window.addEventListener("load", chargerMedia);
