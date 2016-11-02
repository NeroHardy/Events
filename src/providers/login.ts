import { Injectable } from '@angular/core';
import { Http,Headers} from '@angular/http';
import 'rxjs/add/operator/map';
import {NavController} from "ionic-angular";
/*
  Generated class for the Login provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/

@Injectable()
export class Login {
	isLoggedin: boolean;
  AuthToken;

  constructor(public http: Http) {
    this.http = http;
    this.isLoggedin = false;
    this.AuthToken = null;
  }
  storeUserCredentials(token) {
    window.localStorage.setItem('user', token);
    this.useCredentials(token);    
  }

  useCredentials(token) {
     this.isLoggedin = true;
     this.AuthToken = token;
  }
    
  loadUserCredentials() {
    var token = window.localStorage.getItem('user');
    this.useCredentials(token);
  }
    
  destroyUserCredentials() {
    this.isLoggedin = false;
    this.AuthToken = null;
    window.localStorage.clear();
  }

  authenticate(user) {
    var credenciales = "user=" + user.user + "password=" + user.password;
    var headers = new Headers();
    headers.append('Content-Type', 'application/x-www-form-urlencoded');
      return new Promise(resolve => {
        this.http.post(' http://127.0.0.1:80/event/php/LoginService.php', credenciales, {headers: headers}).subscribe(data => {
          if(data.json().success){
            this.storeUserCredentials(data.json().token);
            resolve(true);
          }
          else
            resolve(false);
        });
      });
  }

  logout() {
    this.destroyUserCredentials();
  }
}
