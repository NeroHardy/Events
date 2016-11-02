import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';

/*
  Generated class for the Categories page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-categories',
  templateUrl: 'categories.html'
})
export class Categories {

  constructor(public navCtrl: NavController) {}

  ionViewDidLoad() {
    console.log('Hello Categories Page');
  }

}
