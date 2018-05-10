import { Component, OnInit, Input } from '@angular/core';
import { Post } from '../../../model/post';

@Component({
  selector: 'app-post-item-list',
  templateUrl: './post-item-list.component.html',
  styleUrls: ['./post-item-list.component.css']
})
export class PostItemListComponent implements OnInit {
  @Input() post : Post;
  @Input() hideProfile : false;
  constructor() { }

  ngOnInit() {
  }

}
