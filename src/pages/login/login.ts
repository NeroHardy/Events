import { Component } from '@angular/core';
import { NavController, ViewController } from 'ionic-angular';
import { NativeStorage, SQLite } from 'ionic-native';
import {Newuser} from '../newuser/newuser';
import { TabsPage } from '../tabs/tabs';
import {Login} from '../../providers/login.ts';
/*
  Generated class for the Login page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-login',
  templateUrl: 'login.html',
  providers:[Login]
})
export class LoginPage {
  newuser=Newuser;
  tabs=TabsPage;
  data = {
            user: '',
            password: ''
        };
  constructor(private navCtrl: NavController,private viewCtrl : ViewController, private Login:Login) {
    
  }
  ionViewDidLoad() {
    //this.db.Query("create table if not exists comics(id integer primary key autoincrement, title text,autor text, cover text, year integer)");
  }

  Clogin(user){
    this.Login.authenticate(user).then(data => {
      if(data) {
        this.navCtrl.setRoot(TabsPage);
      }
    });
  }
}
