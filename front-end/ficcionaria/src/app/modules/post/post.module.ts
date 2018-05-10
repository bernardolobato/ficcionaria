import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SavePostComponent } from '../../components/post/save-post/save-post.component';
import { FormsModule } from '@angular/forms';
import { ViewPostComponent } from '../../components/post/view-post/view-post.component';
import { ListPostComponent } from '../../components/post/list-post/list-post.component';
import { PostItemListComponent } from '../../components/post/post-item-list/post-item-list.component'
import { RouterModule } from '@angular/router';
import { FooterComponent } from '../../components/layout/footer/footer.component';
import { HeaderComponent } from '../../components/layout/header/header.component';
import { HomeComponent } from '../../components/home/home.component';
import { LayoutModule } from '../layout/layout.module';
import { PostFormComponent } from '../../components/post/post-form/post-form.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

@NgModule({
  imports: [
    CommonModule,
    NgbModule,
    FormsModule,
    RouterModule,
    LayoutModule,
  ],
  declarations: [SavePostComponent, ViewPostComponent, ListPostComponent, PostItemListComponent, PostFormComponent],
  exports: [SavePostComponent, ViewPostComponent, ListPostComponent, PostItemListComponent, PostFormComponent]
})
export class PostModule { }
