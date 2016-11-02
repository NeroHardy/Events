import { NgModule } from '@angular/core';
import { IonicApp, IonicModule} from 'ionic-angular';
import { MyApp } from './app.component';
import { AboutPage } from '../pages/about/about';
import { UserPage } from '../pages/user/user';
import { HomePage } from '../pages/home/home';
import { TabsPage } from '../pages/tabs/tabs';
import {LoginPage} from '../pages/login/login';
import {Newuser} from '../pages/newuser/newuser';
import {Login} from '../providers/login.ts';
import {Storage} from '@ionic/storage';
@NgModule({
  declarations: [
    MyApp,
    AboutPage,
    UserPage,
    HomePage,
    TabsPage,
    LoginPage,
    Newuser
  ],
  imports: [
    IonicModule.forRoot(MyApp)
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    AboutPage,
    UserPage,
    HomePage,
    TabsPage,
    LoginPage,
    Newuser
  ],
  providers: [Storage,Login]
})
export class AppModule {}
