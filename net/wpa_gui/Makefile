# Created by: Ilya Bakulin <webmaster@kibab.com>
# $FreeBSD$

PORTNAME=	wpa_gui
PORTVERSION=	2.4
CATEGORIES=	net
MASTER_SITES=	http://hostap.epitest.fi/releases/ \
		http://partmedia.users.sourceforge.net/dist/:icons \
		LOCAL/jgh/net/${PORTNAME}/:icons
DISTNAME=	wpa_supplicant-${PORTVERSION}
DISTFILES=	${DISTNAME}.tar.gz \
		wpa-gui-icons.tar.gz:icons

MAINTAINER=	ports@FreeBSD.org
COMMENT=	Qt-based frontend for wpa_supplicant

PLIST_FILES=	sbin/wpa_gui \
		share/applications/wpa_gui.desktop \
		share/pixmaps/wpa_gui.svg
WRKSRC=		${WRKDIR}/${DISTNAME}/wpa_supplicant/wpa_gui-qt4
USE_QT4=	gui moc_build rcc_build uic_build
USES=		qmake

post-patch:
	@${REINPLACE_CMD} -e "s|Exec=wpa_gui|Exec=${PREFIX}/sbin/wpa_gui|" \
	    ${WRKSRC}/wpa_gui.desktop
	${MV} ${WRKDIR}/icons/hicolor ${WRKSRC}/icons

do-install:
	${INSTALL_PROGRAM} ${WRKSRC}/${PORTNAME} ${STAGEDIR}${PREFIX}/sbin
	${INSTALL_DATA} ${WRKSRC}/wpa_gui.desktop ${STAGEDIR}${PREFIX}/share/applications
	${INSTALL_DATA} ${WRKSRC}/icons/wpa_gui.svg ${STAGEDIR}${PREFIX}/share/pixmaps

.include <bsd.port.mk>
