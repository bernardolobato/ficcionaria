import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';


import { AppComponent } from './app.component';
import { PostModule } from './modules/post/post.module';
import { ProfileModule } from './modules/profile/profile.module';

import { RouterModule } from '@angular/router';
import { routingComponents } from './app.routing';
import { FormsModule } from '@angular/forms';
import { NoopAnimationsModule} from '@angular/platform-browser/animations';
import { MaterialModule } from './modules/material-module';
import { HomeComponent } from './components/home/home.component'


@NgModule({
  declarations: [
    AppComponent,
    HomeComponent
  ],
  imports: [
    BrowserModule,
    PostModule,
    routingComponents,
    FormsModule,
    NoopAnimationsModule,
    MaterialModule,
    ProfileModule
  ],
  providers: [],
  bootstrap: [AppComponent],
  exports: [HomeComponent]
})
export class AppModule { }
