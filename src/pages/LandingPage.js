
import React, { useState } from 'react'
import { makeStyles } from '@material-ui/core/styles'
import Header from '../components/Header'
import { Box,Grid, Link } from '@material-ui/core'
import Button from '@material-ui/core/Button'
import Setting from '../components/Setting'
import {BiArrowBack,BiXCircle} from "react-icons/bi"
import AppBar from '@material-ui/core/AppBar'
import Tabs from '@material-ui/core/Tabs'
import Tab from '@material-ui/core/Tab'
import Typography from '@material-ui/core/Typography'
import PropTypes from 'prop-types'
import TextField from '@material-ui/core/TextField'
import Select from "react-dropdown-select"
import Dialog from '@material-ui/core/Dialog'
import DialogActions from '@material-ui/core/DialogActions'
import DialogContent from '@material-ui/core/DialogContent'
import DialogContentText from '@material-ui/core/DialogContentText'
import Slide from '@material-ui/core/Slide'
import FormGroup from '@material-ui/core/FormGroup'
import Toolkit from './DashboardTab/Toolkit'
import UserTemplate from './DashboardTab/UserTemplate'
import ProgramTemplate from './DashboardTab/ProgramTemplate'
import Reporting from './DashboardTab/Reporting'
import LeftNav from '../components/LeftNav'

const Transition = React.forwardRef(function Transition(props, ref) {
    return <Slide direction="up" ref={ref} {...props} />;
  });

function TabPanel(props) {
    const { children, value, index, ...other } = props;
  
    return (
      <div
        role="tabpanel"
        hidden={value !== index}
        id={`scrollable-auto-tabpanel-${index}`}
        aria-labelledby={`scrollable-auto-tab-${index}`}
        {...other}
      >
        {value === index && (
          <Box p={3}>
            <Typography>{children}</Typography>
          </Box>
        )}
      </div>
    );
  }
  
  TabPanel.propTypes = {
    children: PropTypes.node,
    index: PropTypes.any.isRequired,
    value: PropTypes.any.isRequired,
  };
  
  function a11yProps(index) {
    return {
      id: `scrollable-auto-tab-${index}`,
      'aria-controls': `scrollable-auto-tabpanel-${index}`,
    };
  }
  
function LandingPage({ options }) {
    const classes = useStyles();
    const [value, setValue] = React.useState(0);

  const handleChange = (event, newValue) => {
    setValue(newValue);
  };
//  modal  //
  const [open, setOpen] = React.useState(false);

  const handleClickOpen = () => {
    setOpen(true);
  };

  const handleClose = () => {
    setOpen(false);
  };
    return (
        <div>
             <Header />
            <Box className={classes.Pagecontent}>
               <Box className={classes.Leftcol}>
               <Box className={classes.leftnav}>  
               <Box className={classes.pageTop} style={{marginBottom:'40px'}}>
                     
                 </Box>
                <LeftNav />
                 {/* left Accordion*/}
               
                 <Box className={classes.bottomnav}>
                 <Setting />
               </Box>
               </Box>
               
               </Box>
               {/* right col */}
               <Box className={classes.Rightcol}>
               <Button className={classes.backBtn}><BiArrowBack className={classes.backarrow} /></Button>
               
               </Box>
                {/* modal */}
               
            </Box>
        </div>
    )
}

export default LandingPage
const useStyles = makeStyles(() => ({
    Pagecontent:{
        width:'100%',
        display:'flex',
        textAlign:'left'
    },
    Templatecontent:{
        '& ul':{
            listStyle:'none',
            margin:'0px',
            padding:'0px',
            '& li':{
                marginBottom:'15px',
                display:'flex',
                justifyContent:'space-between',
                alignItems:'center',
                '& span':{
                    width:'250px'
                }
            }
        }
    },
   
    backBtn:{
      display:'flex',
      alignItems:'center',
      justifyContent:'flex-start',
      width:30,
      height:20,
      '&:hover':{
          background:'none'
      }
  },
    Dashboard:{
        fontSize:'16px',
        color:'#7087A7',
        textTransform:'capitalize'
    },
    btncol:{
        display:'flex',
        justifyContent:'flex-end',
        marginTop:'100px'
    },
    topheading:{
        marginBottom:'50px',
        fontWeight:'600',
        color:'#141621'
    },
    Tabcol:{
      position:'relative',
        '& .MuiTabPanel-root':{
            padding:'0px'
        }
    },
    contacttab:{
      background:'#F3F3F3',
      borderRadius:'10px',
      boxShadow:'none',
      color:'#000',
      textTransform:'capitalize',
      overflow:'hidden',
      '& .MuiTabs-flexContainer':{
          flexDirection:'row',
          justifyContent:'space-between'
      },
      '& .MuiTabScrollButton-root:last-child':{
          position:'absolute',
          right:'-15px',
          marginTop:'11px'
      },
      '& .MuiTabScrollButton-root:first-child':{
        position:'absolute',
        left:'-15px',
        zIndex:'99',
        marginTop:'12px'
    },
      '& .MuiTabs-indicator':{
        display:'none !important'
      },
      '& .MuiTabScrollButton-root':{
          width:'25px',
          height:'25px',
          borderRadius:'50%',
          background:'#0A70E8',
          color:'#fff',
      },
      '& .MuiTab-root':{
        textTransform:'capitalize',
        fontFamily:'Poppins'
      },
      '& .MuiTabs-flexContainer':{
        borderRadius:'10px',
        background:'#F3F3F3',
        textTransform:'capitalize',
        justifyContent:'space-between',
        '& .MuiTab-textColorPrimary.Mui-selected':{
          background:'#D9E3F0',
          color:'#000',
          borderRadius:'10px'
        },
        '& .MuiTab-textColorInherit':{
          textTransform:'capitalize',
          fontSize:'16px',
          padding:'0 22px'
        }
      },
      
    },
    toprow:{
        width:'100%',
        borderBottom:'2px #E3E5E5 solid',
        display:'flex',
        color:'#919699',
        paddingBottom:'10px',
    },
    pageTop:{
        textAlign:'left',
        marginBottom:'40px',
        display:'flex',
        '& button':{
            padding:'0px',
            background:'none',
            color:'#919699',
            fontSize:'15px',
            textTransform:'capitalize',
            fontWeight:'500'
        }
    },
    profile:{
        width:'80px',
        height:'80px',
        borderRadius:'50%',
        overflow:'hidden',
        '& img':{
            width:'100%'
        }
    },
    backarrow:{
        color:'#7087A7',
        fontSize:'20px',
        marginRight:'8px'
    },
    Leftcol:{
        width:'15%',
        padding:'20px 3%',
        position:'relative',
        minHeight:'700px'
    },
    bottomnav:{
        position:'absolute',
        bottom:'0px',
        left:'0px'
    },
    leftnav:{
    position:'absolute',
    top:'15px',
    bottom:'15px',
    left:'40px',
    right:'40px'
    },
    Rightcol:{
        width:'73%',
        padding:'20px 3%',
        borderLeft:'1px #F6F6F6 solid',
        '& .MuiAccordionSummary-root':{
            borderBottom:'1px #E3E5E5 solid',
            height:'40px',
            color:'#919699',
            padding:'0px',
            fontFamily:'Poppins',
        },
        '& .MuiAccordion-root:before':{
            display:'none'
        },
        '& .MuiTab-root':{
          minWidth:'18%',
        },
        '& .MuiTab-root:nth-child(6)':{
          minWidth:'30%',
        },
        '& .MuiTab-root:nth-child(7)':{
          minWidth:'30%',
        },
        '& .MuiBox-root':{
            paddingLeft:'0px',
            paddingRight:'0px'
        },
        '& .MuiTab-root':{
            minHeight:'40px'
          },
          '& .MuiTabs-root':{
            minHeight:'40px'
          }
    },
    
Downarrow:{
    fontSize:'20px',
    color:'#7087A7',
    marginLeft:'5px'
},
Uploadbtn:{
    width:'230px',
    height:'50px',
    background:'#F9F9F9',
    color:'#AEAEAE',
    fontSize:'14px',
    display:'flex',
    justifyContent:'space-between',
    borderRadius:'10px',
    boxShadow:'none',
    textTransform:'capitalize'
},
Editbtn:{
  background:'#fff',
  border:'1px #AEAEAE solid',
  width:'60px',
  height:'30px',
  color:'#7087A7',
  textTransform:'capitalize',
  borderRadius:'10px',
  fontWeight:'600',
  '&:hover':{
    background:'#7087A7',
    color:'#fff',
  }
},

icon:{
  color:'#7087A7',
  fontSize:'30px',
  marginRight:'10px'
},
downloadicon:{
    position:'absolute',
    right:'20px',
    zIndex:'99',
    color:'#7087A7',
  fontSize:'30px',
  top:'10px',
  cursor:'pointer'
},

modal:{
    '& .MuiPaper-rounded':{
        borderRadius:'10px !important',
        padding:'20px',
        width:'776px',
        maxWidth:'776px'
    }
},
ccmmodal:{
    borderRadius:'10px',
},
modalbtn:{
    display:'flex',
    justifyContent:'space-between',
    marginRight:'30px',
    marginLeft:'15px',
    alignItems:'center'
},
Formcol:{
  display:'flex',
  alignItems:'center',
  marginBottom:'30px',
  '&>div':{
      width:'100%'
  },
  '& p':{
      fontSize:'18px',
      margin:'0px'
  },
  '& label':{
      flex:'0 0 205px',
      color:'#000',
      fontSize:'15px',
      fontWeight:'400'
  },
  '& .react-dropdown-select-input':{
      width:'100%'
  }
},
select:{
  width:'100%',
  border:'none !important',
  borderRadius:'10px !important',
  background:'#F1F1F1',
  height:'50px',
  fontSize:'18px !important',
  paddingLeft:'15px !important',
  paddingRight:'15px !important'
},
}));