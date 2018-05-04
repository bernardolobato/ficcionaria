import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SavePostComponent } from '../../components/post/save-post/save-post.component';
import { FormsModule } from '@angular/forms';
import { MaterialModule } from './../material-module';
import { ViewPostComponent } from '../../components/post/view-post/view-post.component';
import { ListPostComponent } from '../../components/post/list-post/list-post.component';
import { PostItemListComponent } from '../../components/post/post-item-list/post-item-list.component'
import { RouterModule } from '@angular/router';
import { FooterComponent } from '../../components/layout/footer/footer.component';
import { HeaderComponent } from '../../components/layout/header/header.component';
import { HomeComponent } from '../../components/home/home.component';
import { LayoutModule } from '../layout/layout.module';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    MaterialModule,
    RouterModule,
    LayoutModule
  ],
  declarations: [SavePostComponent, ViewPostComponent, ListPostComponent, PostItemListComponent],
  exports: [SavePostComponent, ViewPostComponent, ListPostComponent, PostItemListComponent]
})
export class PostModule { }
