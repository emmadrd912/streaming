import Helpers from "../Helpers.js";

export default class Media {
  constructor(data) {
    this.data = data;
  }

  remplir() {
    Helpers.id("poster").src = Helpers.posterUrl(this.data.poster_path);
  }
}
