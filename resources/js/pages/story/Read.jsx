import * as React from 'react';
import * as ReactDOM from 'react-dom';
import Detail from '../../components/story/Detail'

const root = document.getElementById('react-root');
if (root) {
  ReactDOM.render(
     <Detail />,
      root
  );
}