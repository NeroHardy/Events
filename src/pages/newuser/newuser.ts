import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';

/*
  Generated class for the Newuser page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-newuser',
  templateUrl: 'newuser.html'
})
export class Newuser {

  constructor(public navCtrl: NavController) {}

  ionViewDidLoad() {
    console.log('Hello Newuser Page');
  }

}
