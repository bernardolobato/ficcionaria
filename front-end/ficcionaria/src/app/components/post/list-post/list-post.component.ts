import { Component, OnInit, Input } from '@angular/core';
import { Post } from '../../../model/post';
import { post } from 'selenium-webdriver/http';

@Component({
  selector: 'app-list-post',
  templateUrl: './list-post.component.html',
  styleUrls: ['./list-post.component.css']
})
export class ListPostComponent implements OnInit {
@Input()
posts: Post[];
@Input()
hideProfile: boolean;
postsReverse: Post[];
  constructor() { }

  ngOnInit() {
    this.postsReverse = this.posts.reverse();
  }

}
