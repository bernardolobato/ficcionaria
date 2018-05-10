import { Component, OnInit } from '@angular/core';
import { PostService } from '../../../services/post.service';

@Component({
  selector: 'app-view-profile',
  templateUrl: './view-profile.component.html',
  styleUrls: ['./view-profile.component.css']
})
export class ViewProfileComponent implements OnInit {
  posts;
  model;
  constructor(private service: PostService) { }

  ngOnInit() {
   this.service.list().subscribe((posts) => {
     this.posts = posts;
   });
  }

}
