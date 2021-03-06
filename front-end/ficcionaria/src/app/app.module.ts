import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';


import { AppComponent } from './app.component';
import { PostModule } from './modules/post/post.module';
import { ProfileModule } from './modules/profile/profile.module';

import { RouterModule } from '@angular/router';
import { routingComponents } from './app.routing';
import { FormsModule } from '@angular/forms';
import { NoopAnimationsModule} from '@angular/platform-browser/animations';
import { HomeComponent } from './components/home/home.component';
import { PostService } from './services/post.service';
import { HttpClientModule } from '@angular/common/http';
import { HttpModule } from '@angular/http';
import { HeaderComponent } from './components/layout/header/header.component';
import { FooterComponent } from './components/Layout/footer/footer.component';
import { LayoutModule } from './modules/layout/layout.module';
import {NgbModule} from '@ng-bootstrap/ng-bootstrap';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
  ],
  imports: [
    NgbModule.forRoot(),
    BrowserModule,
    PostModule,
    routingComponents,
    FormsModule,
    NoopAnimationsModule,
    ProfileModule,
    HttpModule,
    RouterModule,
    LayoutModule,
  ],
  providers: [ PostService ],
  bootstrap: [AppComponent],
  exports: [HomeComponent]
})
export class AppModule { }
