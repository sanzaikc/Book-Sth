module.exports = {
  theme: {
      pagination: theme => ({
        link: 'bg-white px-3 py-1 border-r border-t border-b text-black no-underline flex items-center',
        linkActive: 'bg-blue-200 border border-blue-500 font-bold',
        linkFirst: 'mr-6 border rounded',
        linkSecond: 'rounded-l border-l',
        linkBeforeLast: 'rounded-r',
        linkLast: 'ml-6 border rounded',
    })
  },
  variants: {},
  plugins: [
    require('tailwindcss-plugins/pagination'),
  ],
}
