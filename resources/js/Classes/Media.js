import Helpers from "../Helpers.js";

export default class Media {
  constructor(data) {
    this.data = data;
  }

  remplir() {
    Helpers.id("poster").src = Helpers.posterUrl(this.data.poster_path);
  }
  remplir1() {
    Helpers.id("poster1").src = Helpers.posterUrl(this.data.poster_path);
  }
  remplir2() {
    Helpers.id("poster2").src = Helpers.posterUrl(this.data.poster_path);
  }
  remplir3() {
    Helpers.id("poster3").src = Helpers.posterUrl(this.data.poster_path);
  }
  remplir4() {
    Helpers.id("poster4").src = Helpers.posterUrl(this.data.poster_path);
  }
}
